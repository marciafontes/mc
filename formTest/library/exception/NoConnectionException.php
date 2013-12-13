<?php

	class NoConnectionException extends Exception
	{
		public function NoConnectionException($message = null)
		{
			$this->message = $message;
		}
	}
?>