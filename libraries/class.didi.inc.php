<?php
class didi
{
	private $db;

	public function __construct()
	{
		$this->db = new SQLite3(realpath(dirname(__FILE__)."/../did-i.db"));
	}

	public function addItem($item="")
	{
		$added_on = date("Y-m-d H:i:s");
		$read_on = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO items (item, added_on) VALUES (:item, :added_on);";
		$statement = $this->db->prepare($sql);
		$statement->bindParam(":item", $item, SQLITE3_TEXT);
		$statement->bindParam(":added_on", $added_on, SQLITE3_TEXT);
		$statement->execute();
		return true;
	}
	
	public function deleteItem($id="0")
	{
		$statement = $this->db->prepare("UPDATE items SET is_deleted='Y' WHERE id=:id;");
		$statement->bindParam(":id", $id, SQLITE3_INTEGER);
		$statement->execute();
		
		return true;
	}
	
	public function getItemsList()
	{
		$query = $this->db->query("SELECT * FROM items WHERE is_deleted='N' ORDER BY `item` COLLATE NOCASE ASC;");

		$entries = array();
		while ($entry = $query->fetchArray(SQLITE3_ASSOC)) {
			$entries[] = $entry;
		}
		
		return $entries;
	}
}