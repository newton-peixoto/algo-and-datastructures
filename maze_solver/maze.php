<?php 


class Maze 
{

    public array $points = [];
    public int $start_x;
    public int $start_y;

    private const DIRECTIONS = [
        [0, 1],
        [1, 0],
        [0, -1],
        [-1, 0]
    ];

    public function load(): void
    {
        $file = fopen('maze.txt', 'r');

        $x = 0;

        while (!feof($file)) {

            $line = trim(fgets($file));

            for ($y = 0; $y < strlen($line); $y++ ) {
                $this->points[$x][$y] = $line[$y];
                if ($line[$y] == 'S') {
                    $this->start_x = $x; $this->start_y = $y;
                }
            }
            $x++;
        }
        fclose($file);
    }

    public function display($title): void
    {
        echo "<h3>". $title ."</h3>";

        for ($x = 0; $x < count($this->points); $x++) {
            echo "<table><tr>";

            for ($y = 0; $y < count($this->points[$x]); $y++) {
                echo "<td width='10px'>" . $this->points[$x][$y] . "</td>";
            }
            echo "</tr></table>";
        }
    }

    public function findPath(int $x, int $y): bool
    {
        // out of bound
        if (!isset($this->points[$x][$y])) {
            return false;
        }

        // we got it
        if ($this->points[$x][$y] == 'G') {
            return true;
        }

        // its a wall or a seen point;
        if ($this->points[$x][$y] != '.' && $this->points[$x][$y] != 'S') {
            return false;
        }

        // mark as seen
        $this->points[$x][$y] = '+';

        foreach(self::DIRECTIONS as $direction) {
            [$xDir, $yDir] = $direction;

            if($this->findPath($x + $xDir, $y + $yDir)) {
                return true;
            }
        }

        // remove from seen
        $this->points[$x][$y] = 'x';

        return false;
    }
}

