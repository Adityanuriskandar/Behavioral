<?php                                                                                       
class MyIterator implements Iterator {
    private $position = 0;
    private $data;
    
    public function __construct($data) {
        $this->position = 0;

        $this->data = $data; 
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {    
        return $this->data[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function prev() {
        --$this->position;
	}
    
    public function valid() {
        return isset($this->data[$this->position]);
    }


	public function remove($position) {
		unset($this->data[$position]);
	}
}


$articles = [
	0 => [
		'title' => 'Makanan 1',
		'content' => 'Konten 1'
	],
	1 => [
		'title' => 'Makanan 2',
		'content' => 'Konten 2'
	],
	2 => [
		'title' => 'Makanan 3',
		'content' => 'Konten 3'
	]
];


$object = new MyIterator($articles);


echo 'Index sekarang : ' . $object->current()['title'] . "\n";

$object->next();

echo 'Maju satu index : ' . $object->current()['title'] . "\n";

$object->rewind();

echo 'Setelah di reset : ' . $object->current()['title'] . "\n";

$object->remove(1);
print_r($object);
?>