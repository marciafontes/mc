<?php 

	class OperationException extends Exception
	{
		public function OperationException($message)
		{
			$this->message = $message;
		}
	}
?>