<?php 

require "./maze.php";

$maze = new Maze;

$maze->load();

$maze->display("Before walking");

$maze->findPath($maze->start_x, $maze->start_y);

$maze->display("After solving");