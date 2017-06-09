<?php
function datetime_from_format($datetime, $format_from, $format_to = 'Y-m-d H:i:s')
{
	$datetime_new = DateTime::createFromFormat($format_from, $datetime);
	return $datetime_new->format($format_to);
}

function build_tree(Array $data, $parent = 0)
{
    $tree = array();
    foreach ($data as $d)
	{
        if ($d['parent_id'] == $parent)
		{
            $children = build_tree($data, $d['id']);
            // set a trivial key
            if (!empty($children))
			{
                $d['child'] = $children;
            }
            $tree[] = $d;
        }
    }
	return $tree;
}

function pr($data)
{
	if (is_array($data))
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	else
		var_dump($data);
}

function print_tree($tree, $r = 0, $p = null, $data = array())
{
	foreach ($tree as $i => $t)
	{
        $dash = ($t['parent_id'] == 0) ? '' : str_repeat('-', $r).' ';
        $data[$t['id']] = $dash.$t['text'];
        if ($t['parent_id'] == $p)
		{
            // reset $r
            $r = 0;
        }
        if (isset($t['child']))
		{
            $data = print_tree($t['child'], ++$r, $t['parent_id'], $data);
        }
    }
	return $data;
}
?>
