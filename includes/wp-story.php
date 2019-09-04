<?php


class Wp_Story {

	private $id;
	private $photo;
	private $name;
	private $link;
	private $lastUpdated;
	private $items = [];

	/**
	 * Wp_Story constructor.
	 */
	public function __construct() {
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ): void {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getPhoto() {
		return $this->photo;
	}

	/**
	 * @param mixed $photo
	 */
	public function setPhoto( $photo ): void {
		$this->photo = $photo;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ): void {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param mixed $link
	 */
	public function setLink( $link ): void {
		$this->link = $link;
	}

	/**
	 * @return mixed
	 */
	public function getLastUpdated() {
		return $this->lastUpdated;
	}

	/**
	 * @param mixed $lastUpdated
	 */
	public function setLastUpdated( $lastUpdated ): void {
		$this->lastUpdated = $lastUpdated;
	}

	/**
	 * @return array
	 */
	public function getItems(): array {
		return $this->items;
	}

	/**
	 * @param array $items
	 */
	public function setItems( array $items ): void {
		$this->items = $items;
	}
}