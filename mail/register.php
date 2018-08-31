<p>您好<?php echo $name;?>：</p>
<p>你的账户激活链接如下(点击激活注册账户):</p>
<?php $url = Yii::$app->urlManager->createAbsoluteUrl(['member/active','timestamp'=>$time,'username'=>$name,'token'=>$token])?>
<p><a href="<?php echo $url ;?>"><?php echo $url?></a></p>

<p>该链接5分钟内有效，请勿传递给他人！</p>
<p>该邮件为系统自动发送，请勿回复</p>
