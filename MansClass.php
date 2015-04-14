<?php 


/**
* Mans Class
*/
class MainClass
{

	protected $name;
	protected $msg;
	
	public function setName()
	{
		return $this->name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function checkName()
	{
		if ($this->name == '') {
			$msg = 'Empty';
		}else {
			$msg = 'Your Name: ' . $this->name;
		}

		return $msg;
	}
}

?>