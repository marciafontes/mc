<?php

class Div
{
	
	public static function divClass($className,$id=null)
	{
		echo '<div class="'.$className.'"  id="'.$id.'">';
	}
	
	public static function divClassContent($className,$content)
	{
		echo '<div class="'.$className.'"> '.$content.' </div>';
	}
	
	public static function close()
	{
		echo '</div>';
	}

	public function divMessage($content,$size)
	{
		echo '<div class="alert alert-info" style="width:'.$size.'px;" >'.$content.'</div>';
	}

	public static function divClassImage($className,$nameImage)
	{
		echo '<div class="'.$className.'"> <img  alt="test" src="../styles/images/icons/'.$nameImage.'"></div>';
	}
}