<?php
$same_numbers = 0;
$numbers_change_to_zeros = array();
$solo_number_change_coordinates = array();
$is_there_number_above_zero = false;
$exist_same_numbers_rows = true;
$exist_same_numbers_columns = true;
$help_arr = array();
$help_row = array();
$swaped_board = array();

function riddle_solver($board) {
    do {
        find_same_numbers($board, 0);
        $swaped_board = swap_rows_and_columns($board);
        find_same_numbers($swaped_board, 1);
        change_sames_to_zeros($board);
        $board = swap_rows_and_columns($board);
        move_numbers_below_zeros($board);
        $board = swap_rows_and_columns($board);
        $numbers_change_to_zeros = array();

    } while ($exist_same_numbers_rows || $exist_same_numbers_columns)

    return $board;
}

// $example_board is two-dimensional board
// it moves zeros to the left side
function move_numbers_below_zeros($example_board) {
    do {
        $is_there_number_above_zero = false;
        foreach ($example_board as $row) {
            for ($i = 0; $i < count($row) - 1; $i++) {
                if ($row[$i] != 0 && $row[$i + 1] === 0) {
                    $row[$i + 1] = $row[$i];
                    $row[$i] = 0;
                    $is_there_number_above_zero = true;
                }
            }
        }
    } while ($is_there_number_above_zero);
}

function change_sames_to_zeros($example_board) {
    foreach ($numbers_change_to_zeros as $row) {
        for ( $i = $row[2]; $i <= $row[3]; $i++) {
            $row[0] ? $example_board[$i][$row[1]] = 0 : $example_board[$row[1]][$i] = 0;
        }
    }
}

function swap_rows_and_columns($example_board) {
    $help_arr = array();
    for ($c = 0; $c < count($example_board[0]); $c++) {
        $help_row = array();

        foreach ($example_board as $index => $row) {
            array_push($help_row, $row[$c]);
        }
        array_push($help_arr, $help_row);
    }

    return $help_arr;
}

// 0 - row, 1 - column
function find_same_numbers($board, $row_or_column) {
    !$row_or_column ? $exist_same_numbers_rows = false : $exist_same_numbers_columns = false;

    foreach ($boars as $index => $row) {
        for ($i = 0; $i < count($row); $i++) {
            $solo_number_change_coordinates = array($row_or_column);
            $same_numbers = 0;

            for ($j = $i + 1; $j < count($row); $j++) {
                if ($row[$i] === $row[$j] && $row[$i]) {
                    $same_numbers++;
                    continue;
                } else break;
            }

            if ($same_numbers >= 2) {
                array_push($solo_number_change_coordinates, $index, $i, $i + $same_numbers);
                array_push($numbers_change_to_zeros, $solo_number_change_coordinates);

                $i += $same_numbers;

                !$row_or_column ? $exist_same_numbers_rows = true : $exist_same_numbers_rows = true;
            }
        }
    }

    return !$row_or_column ? $exist_same_numbers_rows : $exist_same_numbers_columns;
}