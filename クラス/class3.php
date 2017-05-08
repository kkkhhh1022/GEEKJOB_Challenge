<?php
    abstract class Base {
        protected function load(){}
        public function show(){}
    }
    class Human extends Base {
        private $table = member;
        private $arr = "";
        public function load(){
            $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
            $sql = "SELECT * FROM $this->table";
            $query = $pdo_object->prepare($sql);
            $query->execute();
            $human_db = $query->fetchall(PDO::FETCH_ASSOC);
            $this->arr = $human_db;
            $pdo_object = null;
        }
        public function show() {
            foreach($this->arr as $arr_num => $arr) {
                echo "<tr>";
                foreach($arr as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        }
    }
    class Station extends Base {
        private $table = station;
        private $arr = "";
        public function load(){
            $pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','kitagawa','19881022');
            $sql = "SELECT * FROM $this->table";
            $query = $pdo_object->prepare($sql);
            $query->execute();
            $station_db = $query->fetchall(PDO::FETCH_ASSOC);
            $this->arr = $station_db;
            $pdo_object = null;
        }
        public function show() {
            foreach($this->arr as $arr_num => $arr) {
                echo "<tr>";
                foreach($arr as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>challenge9_1</title>
    </head>
    <body>
        <table border="1" width="50%" style="table-layout: fixed;">
            <h2>Humanクラス</h2>
            <tr>
                <td>ID</td>
                <td>名前</td>
                <td>年齢</td>
                <td>性別</td>
                <td>誕生日</td>
            </tr>
            <?php
                $human = new Human();
                $human->load();
                $human->show();
            ?>
        </table>
        <table border="1" width="50%" style="table-layout: fixed;">
            <h2>Stationクラス</h2>
            <tr>
                <td>駅名</td>
                <td>所在地</td>
            </tr>
            <?php
                $station = new Station();
                $station->load();
                $station->show();
             ?>
        </table>

    </body>
</html>
