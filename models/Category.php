<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/31
 * Time: 14:53
 */
namespace  app\models;
use app\modules\models\Tree;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class  Category extends  ActiveRecord{


    public $icon = array('│', '├', '└');
    public static $str ='';

    public static  function  tableName()
    {
        return '{{%category}}';
    }

    public function attributeLabels()
    {
        return [
            'parent_id'=>'上级分类',
            'title'=>'分类名称'
        ];
    }

    public  function  rules()
    {
        return [
            ['parent_id','required','message'=>'上级分类为必填项!'],
            ['parent_id','validateUnique','message'=>'不能设置下级分类或本身为上级分类','on'=>'edit'],
            ['title','required','message'=>'分类名称不能为空','on'=>['add','edit']],
            ['title','unique','on'=>['add','edit'],'message'=>'分类信息已存在!'],
            ['createtime','safe'],
            ['createtime','default','value'=>time()],
        ];
    }

    //自我和下级不能设置为自己的上级分类
    public function  validateUnique(){
        if (!$this->hasErrors()){
            $id = \Yii::$app->request->get('id');
            //递归获取所有子集分类
            $childData = self::getChild($id);
            if ($this->parent_id==$id || in_array($this->parent_id,$childData)){
                $this->addErrors(['title'=>'不能设置下级分类或本身为上级分类']);
            }
        }
    }
    public  function  add($data){
        $this->scenario ='add';
        if ($this->load($data) && $this->validate()){
            $res = $this->insert();
            return (bool)$res;
        }
        return false;
    }

    public function  edit($data){
        $this->scenario = 'edit';
        if ($this->load($data) && $this->validate()){
            return (bool)$this->save(false);
        }
        return false;
    }

    /***
     * @param $selectid 已选择分类id
     * @return string
     */
    public  function  getCateTree($cateId=0){
        $data = self::find()->select(['id','title','parent_id'])->asArray()->all();
        $tree = new Tree($data,'');
        $pidHtmls = $tree->getArray($cateId);
        return $pidHtmls;
    }

    public  function  getCateOptions(){
        //获取原始数据
        $data = $this->getData();
        $cateTree = $this->getTree($data);
        $cateTree = $this->setPrefix($cateTree);

        $options = ['添加顶级分类'];
        foreach($cateTree as $cate) {
            $options[$cate['id']] = $cate['title'];
        }
        return $options;
    }
    public function  getProCateOptions(){
        $data = $this->getData();
        $cateTree = $this->getTree($data);
        $cateTree = $this->setPrefix($cateTree);
        foreach($cateTree as $cate) {
            $options[$cate['id']] = $cate['title'];
        }
        return $options;
    }


    private  function  getData(){
        $data = self::find()->all();
        $cates = ArrayHelper::toArray($data);
        return $cates;
    }
    private function  getTree($cates,$pid=0){
        $tree = [];
        foreach ($cates as $cate){
            if ($cate['parent_id']==$pid){
                $tree[] = $cate;
                $tree = array_merge($tree,$this->getTree($cates,$cate['id']));
            }
        }
        return $tree;
    }
    public function setPrefix($data, $p = "|--")
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['parent_id'] != $val['parent_id']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['parent_id'], $prefix)) {
                $num = $prefix[$val['parent_id']];
            }

           /* if ($num>1){
                $val['title'] = str_repeat($this->icon[2], $num).$val['title'];
            }else{
                $val['title'] = $this->icon[1].$val['title'];
            }*/
            $val['title'] = str_repeat($p, $num).$val['title'];
            $prefix[$val['parent_id']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    public  static function getChild($myId){
        $child = self::find()->where(['parent_id'=>$myId])->asArray()->all();
        if (!empty($child)){
            foreach ($child as $key=>$value){
                self::$str .= $value['id'].',';
                self::getChild($value['id']);
            }
        }
        return explode(',',trim(self::$str,','));
    }

    /**
     * @return array 获取商品分类 --2级
     */
    public static  function  getMenu(){
        $top = self::find()->where('parent_id = :id',[':id'=>0])->limit(11)->orderBy('createtime asc')->asArray()->all();
        $data = [];
        foreach ((array)$top as $k=>$cate){
            $cate['child'] = self::find()->where('parent_id =:id',[':id'=>$cate['id']])->limit(11)->asArray()->all();
            $data[$k] = $cate;
        }
        return $data;
    }

}