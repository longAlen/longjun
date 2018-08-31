<p>您好<?php echo $name;?>：</p>
<p>你的找回密码链接如下:</p>
<?php $url = Yii::$app->urlManager->createAbsoluteUrl(['admin/manage/mailchangepass','timestamp'=>$time,'username'=>$name,'token'=>$token])?>
<p><a href="<?php echo $url ;?>"><?php echo $url?></a></p>

<p>该链接5分钟内有效，请勿传递给他人！</p>
<p>该邮件为系统自动发送，请勿回复</p>
