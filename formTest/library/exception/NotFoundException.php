<?php 

	class NotFoundException  extends Exception
	{
		public function NotFoundException($message)
		{
			$this->message = $message;
		}
	}
?>