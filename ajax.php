<?php
if (!empty($_POST)) {

    if (empty($_POST['text'])) {
        unset($_POST['text']);
    }

    $result = [];


    $path = $_SERVER['DOCUMENT_ROOT'] . '/';

    $dir = [];

    function search ($file, $searchText) {
        $resLine = '';
        $handle = fopen($file, "r");
        if ($handle) {
            $pattern = preg_quote($searchText, '/');
            $pattern = "/\b$pattern.\b/m";
            $count = 0;
            while (($line = fgets($handle)) !== false) {
                $count++;
                if (preg_match_all($pattern, $line, $matches)) {
                    $resLine .= $count . ' ';
                }
            }

            fclose($handle);
            return $resLine;
        }
        return 0;
    }

    $dir = scandir($path);

    if (!empty($_POST['name'])) {
        foreach ($dir as $key => $val) {
            if ($val == '.' || $val == '..') {
                continue;
            }
            if ($_POST['name'] == explode('.', $val)[0] || $_POST['name'] == $val) {
                if (is_file($_SERVER['DOCUMENT_ROOT'] . '/' .$val)) {
                    $result[$key]['NAME'] = $val;
                    $result[$key]['SRC'] = '/' .$val;
                    if (isset($_POST['text'])) {
                        $result[$key]['LINE'] = search($_SERVER['DOCUMENT_ROOT'] . '/' .$val, $_POST['text']);
                    }
                }
            }
        }
    } elseif (isset($_POST['mask'])) {
        switch ($_POST['mask']) {
            case 1:
                foreach ($dir as $key => $val) {
                    if ($val == '.' || $val == '..') {
                        continue;
                    }
                    if (is_file($_SERVER['DOCUMENT_ROOT'] . '/' .$val)) {
                        $result[$key]['NAME'] = $val;
                        $result[$key]['SRC'] = '/' .$val;
                        if (isset($_POST['text'])) {
                            $result[$key]['LINE'] = search($_SERVER['DOCUMENT_ROOT'] . '/' .$val, $_POST['text']);
                        }
                    }
                }
                break;
            case 2:
                foreach ($dir as $key => $val) {
                    if ($val == '.' || $val == '..') {
                        continue;
                    }
                    if (strlen($val) == 3) {
                        if (is_file($_SERVER['DOCUMENT_ROOT'] . '/' .$val)) {
                            $result[$key]['NAME'] = $val;
                            $result[$key]['SRC'] = '/' .$val;
                            if (isset($_POST['text'])) {
                                $result[$key]['LINE'] = search($_SERVER['DOCUMENT_ROOT'] . '/' .$val, $_POST['text']);
                            }
                        }
                    }
                }
                break;
        }
    }

    $dir = $_SERVER['DOCUMENT_ROOT'] . '/';

    if (empty($result)) {
        $result = false;
    }

    echo json_encode($result);
}