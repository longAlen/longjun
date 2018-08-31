<?php
/**
 * Created by PhpStorm.
 * User: aoniuchu
 * Date: 2018/7/31
 * Time: 16:17
 */
namespace  app\modules\models;

    /**
     * 通用的树型类.
     */
class Tree{
    /**
     * 生成树型结构所需要的2维数组.
    +------------------------------------------------
     * @var array
     */
    public $arr = array();

    /**
     * 生成树型结构所需修饰符号，可以换成图片.
    +------------------------------------------------
     * @var array
     */
    public $icon = array('│', '├', '└');

    /**
     */
    public $ret            = '';
    public $model          = '';
    protected $parentField = 'parent_id';
    protected $_firstItem  = '';

    /**
     * 构造函数，初始化类.
     *
     * @param array 2维数组，例如：
     * array(
     *      1 => array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
     *      2 => array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
     *      3 => array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
     *      4 => array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
     *      5 => array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
     *      6 => array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
     *      7 => array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
     *      )
     */
    public function __construct($arr = array(), $title = '', $value = '0')
    {
        $this->arr = $arr;
        $this->ret = '';
        if (empty($title)) {
            $title = '＝请选择＝';
        }
        $this->_firstItem = " <option value=\"" . $value . "\">" . $title . "</option>";

        return is_array($arr);
    }

    /**
     * 获取菜单树（html）
     * @param  [type]  $data     [数据源，二维数组：array(['id','pid','title'])]
     * @param  integer $selectId [当前选择项ID]
     * @param  string  $parent_id      [description]
     * @return [type]            [description]
     */
    public function toTreeHtml($selectId = 0, $pid = 'parent_id', $root = 0, $showField = 'title')
    {
        $tree = $this->_firstItem;
        foreach ($this->arr as $var) {
            if ($var[$pid] == $root) {
                $tree .= "<option value=\"" . $var['id'] . "\" ";
                if ($var['id'] == $selectId) {
                    $tree .= "selected=\"selected\"";
                }
                $tree .= " >" . $var[$showField] . "</option>";
                $this->ret = '';
                $tree .= $this->getTree($var['id'], "<option value=\$id \$selected>\$spacer\$$showField</option>", $selectId);
            }
        }
        return $tree;
    }

    /**
     * 获取菜单树（html）
     * @param  [type]  $data     [数据源，二维数组：array(['id','pid','title'])]
     * @param  integer $selectId [当前选择项ID]
     * @param  string  $parent_id      [description]
     * @return [type]            [description]
     */
    public function toNewTreeHtml($selectId = 0, $pid = 'parent_id', $root = 0, $showField = 'area_name')
    {
        $tree = $this->_firstItem;
        foreach ($this->arr as $var) {
            if ($var[$pid] == $root) {
                $tree .= "<option value=\"" . $var['id'] . "\" ";
                if ($var['id'] == $selectId) {
                    $tree .= "selected=\"selected\"";
                }
                $tree .= " >" . $var[$showField] . "</option>";
                $this->ret = '';
                $tree .= $this->getTree($var['id'], "<option value=\$id \$selected>\$spacer\$$showField</option>", $selectId);
            }
        }

        return $tree;
    }

    /**
     * 获取菜单树（html）
     * @param  [type]  $data     [数据源，二维数组：array(['id','pid','title'])]
     * @param  integer $selectId [当前选择项ID]
     * @param  string  $parent_id      [description]
     * @return [type]            [description]
     */
    public function toFieldTreeHtml($selectId = 0, $showField = 'display_name')
    {
        $tree = $this->_firstItem;
        foreach ($this->arr as $var) {
            $tree .= "<option value=\"" . $var['id'] . "\" ";
            if ($var['id'] == $selectId) {
                $tree .= "selected=\"selected\"";
            }
            $tree .= " >" . $var[$showField] . "</option>";
            $this->ret = '';
            //$tree .= $this->getTree($var['id'], "<option value=\$id \$selected>\$spacer\$$showField</option>", $selectId);

        }
        return $tree;
    }


    public function treeHtml($selectId = 0, $pid = 'parent_id', $root = 0, $showField = 'title')
    {
        $tree = $this->_firstItem;
        foreach ($this->arr as $var) {
            if ($var[$pid] == $root) {
                $tree .= "<option value=\"" . $var['id'] . "\" ";
                if ($var['id'] == $selectId) {
                    $tree .= "selected=\"selected\"";
                }
                $tree .= " >" . $var[$showField] . "</option>";
                $this->ret = '';
                $tree .= $this->getTree($var['id'], "<option value=\$id \$selected>\$spacer\$$showField</option>", $selectId);
            }
        }
        return $tree;
    }

    /**
     * 得到父级数组.
     *
     * @param int
     *
     * @return array
     */
    public function getParent($myid)
    {
        $newarr = array();
        if (!isset($this->arr[$myid])) {
            return false;
        }

        $pid = $this->arr[$myid]['parentid'];
        $pid = $this->arr[$pid]['parentid'];
        if (is_array($this->arr)) {
            foreach ($this->arr as $id => $a) {
                if ($a['parentid'] == $pid) {
                    $newarr[$id] = $a;
                }
            }
        }

        return $newarr;
    }

    /**
     * 得到子级数组.
     *
     * @param int
     *
     * @return array
     */
    public function getChild($myid)
    {
        $a = $newarr = array();
        if (is_array($this->arr)) {
            foreach ($this->arr as $id => $a) {
                if ($a[$this->parentField] == $myid) {
                    $newarr[$id] = $a;
                }
            }
        }

        return $newarr ? $newarr : false;
    }

    /**
     * 得到当前位置数组.
     *
     * @param int
     *
     * @return array
     */
    public function getPos($myid, &$newarr)
    {
        $a = array();
        if (!isset($this->arr[$myid])) {
            return false;
        }

        $newarr[] = $this->arr[$myid];
        $pid      = $this->arr[$myid]['parentid'];
        if (isset($this->arr[$pid])) {
            $this->getPos($pid, $newarr);
        }
        if (is_array($newarr)) {
            krsort($newarr);
            foreach ($newarr as $var) {
                $a[$var['id']] = $var;
            }
        }

        return $a;
    }

    /**
     * -------------------------------------.

     * @param $myid 表示获得这个ID下的所有子级
     * @param $str 生成树形结构基本代码, 例如: "<option value=\$id \$select>\$spacer\$name</option>"
     * @param $sid 被选中的ID, 比如在做树形下拉框的时候需要用到
     * @param $adds
     * @param $str_group
     */
    public function getTree($myid, $str, $sid = 0, $adds = '', $str_group = '')
    {
        $number = 1;
        $child  = $this->getChild($myid);

        if (empty($child)) {
            return '';
        }
        if (is_array($child)) {
            $total = count($child);
            foreach ($child as $id => $a) {
                $j = $k = '';
                if ($number == $total) {
                    $j .= $this->icon[2];
                } else {
                    $j .= $this->icon[1];
                    $k = $adds ? $this->icon[0] : '';
                }
                $spacer   = $adds ? $adds . $j : $j;
                $selected = $a['id'] == $sid ? 'selected="selected"' : '';
                @extract($a);
                eval("\$nstr = \"$str\";");
                $this->ret .= $nstr;
                $this->getTree($id, $str, $sid, $adds . $k . '&nbsp;');
                ++$number;
            }
        }
        return $this->ret;
    }

    /**
     * 同上一方法类似,但允许多选.
     */
    public function getTreeMulti($myid, $str, $sid = 0, $adds = '')
    {
        $number = 1;
        $child  = $this->getChild($myid);
        if (is_array($child)) {
            $total = count($child);
            foreach ($child as $id => $a) {
                $j = $k = '';
                if ($number == $total) {
                    $j .= $this->icon[2];
                } else {
                    $j .= $this->icon[1];
                    $k = $adds ? $this->icon[0] : '';
                }
                $spacer = $adds ? $adds . $j : '';

                $selected = $this->have($sid, $id) ? 'selected' : '';
                @extract($a);
                eval("\$nstr = \"$str\";");
                $this->ret .= $nstr;
                $this->getTreeMulti($id, $str, $sid, $adds . $k . '&nbsp;');
                ++$number;
            }
        }

        return $this->ret;
    }

    public function have($list, $item)
    {
        return strpos(',,' . $list . ',', ',' . $item . ',');
    }

    /**
     * 格式化数组.
     */
    public function getArray($myid = 0, $sid = 0, $adds = '')
    {
        $number = 1;
        $child  = $this->getChild($myid);
        if (is_array($child)) {
            $total = count($child);
            foreach ($child as $id => $a) {
                $j = $k = '';
                if ($number == $total) {
                    $j .= $this->icon[2];
                } else {
                    $j .= $this->icon[1];
                    $k = $adds ? $this->icon[0] : '';
                }
                $spacer = $adds ? $adds . $j : '';
                @extract($a);
                $a['name']           = $spacer . ' ' . $a['title'];
                $this->ret[$a['id']] = $a;
                $fd                  = $adds . $k . '&nbsp;';
                $this->getArray($id, $sid, $fd);
                ++$number;
            }
        }

        return $this->ret;
    }
}
