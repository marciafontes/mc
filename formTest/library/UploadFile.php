<?php

	class UploadFile
	{
		private $type;
		private $name;
		private $tmpName;
		private $hash;
		private $extension;

		public function UploadFile()
		{
			if(isset($_FILES['file']['name']))
			{
				
				$this->tmpName = $_FILES['file']['tmp_name'];
				$this->type = $_FILES['file']['type'];
				$this->hash = md5($this->name);
		
				switch ($this->type) {
					case 'application/pdf':
							$this->extension = 'pdf';
						break;
				}

				$this->name = basename($_FILES['file']['name'],'.'.$this->extension);
			}

			$this->move();

		}

		private function move()
		{
			$moved = move_uploaded_file($this->tmpName, 'upload/'.$this->name.'.'.$this->extension);

			if($moved)
				echo basename($this->name,$this->extension);
			else 'doesnt work';
		}

		public function getName()
		{
			return $this->name;
		}

		public function getExtension()
		{
			return $this->extension;
		}
	}

 ?>