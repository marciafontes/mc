<?php

class Request
{
	private $dataRequest = array();

	function Request()
	{
		if (!is_null($_GET))
			$this->merge($_GET);

		if(!is_null($_POST))
			$this->merge($_POST);
	}

	private function merge($data)
	{
		$this->dataRequest = array_merge($this->dataRequest,$data);
	}

	public function getKey($key)
	{
		if($this->isElement($key))
			return $this->dataRequest[$key];
		return null;
	}
	
	public function set($key,$data)
	{
		if ($this->isElement($key))
			echo '<strong>Já existe um elemento com a chave requisitada<strong>';
		else 
			$this->dataRequest[$key] = $data;
	}
	
	public function update($key,$data)
	{
		$this->dataRequest[$key] = $data;
	}
	
	public function releaseKey($key,$newKey)
	{
		$data = $this->getKey($key);
		$this->remove($key);
		$this->set($newKey, $data);
	}

	public function isElement($key)
	{
		if(isset($this->dataRequest[$key]))
			return true;
		return false;
	}

	public function explodeRequest()
	{
		var_dump($this->dataRequest);
		die;
	}
	
	public function remove($key)
	{
		unset($this->dataRequest[$key]);
	}

	public function buildObject($isntaceObject)
	{
		$keys =  array_keys($this->dataRequest);

		$ref = new ReflectionClass($isntaceObject);
		$propertiesObject = $ref->getProperties(ReflectionProperty::IS_PRIVATE);

		foreach ($propertiesObject as $propertieObject)
		{
			foreach ($keys as $key)
			{
				if($key == $propertieObject->getName())
				{
					$reflectionMethod = new ReflectionMethod($isntaceObject, 'set'.ucwords($key));
					$reflectionMethod->invoke($isntaceObject,$this->dataRequest[$key]);
				}
			}
		}
		return $isntaceObject;
	}
}

