DROP TABLE IF EXISTS items;

CREATE TABLE IF NOT EXISTS items (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  item VARCHAR(255) NOT NULL DEFAULT '',
  added_on DATETIME NOT NULL,
  is_deleted TEXT CHECK(is_deleted IN ('N','Y')) NOT NULL DEFAULT 'N'
);

UPDATE sqlite_sequence SET seq=1 WHERE `name`='items';

VACUUM;
