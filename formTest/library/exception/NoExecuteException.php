<?php

	class NoExecuteException extends Exception
	{
		
		public function NoExecuteException($message)
		{
			$this->message = $message;
		}
	}

?>