<?php
$pattern = array(
      "#\\\n#is",
      "#\[b\](.+?)\[\/b\]#is",
      "#\[i\](.+?)\[\/i\]#is",
      "#\[u\](.+?)\[\/u\]#is",
      "#\[code\](.+?)\[\/code\]#is",
      "#\[quote\](.+?)\[\/quote\]#is",
      "#\[url=(.+?)\](.+?)\[\/url\]#is",
      "#\[url\](.+?)\[\/url\]#is",
      "#\[img\](.+?)\[\/img\]#is",
      "#\[color=(.+?)\](.+?)\[\/color\]#is",
      "#\[list\](.+?)\[\/list\]#is",
      "#\[listn](.+?)\[\/listn\]#is",
      "#\[\*\](.+?)\[\/\*\]#"
    );
$replacement = array(
      "<br />",
      "<b>\\1</b>",
      "<i>\\1</i>",
      "<span style='text-decoration:underline'>\\1</span>",
      "<code class='code'>\\1</code>",
      "<i>Цитата: \\1</i>",
      "<a href='\\1'>\\2</a>",
      "<a href='\\1'>\\1</a>",
      "<img src='\\1' alt = 'Изображение' />",
      "<span style='color:\\1'>\\2</span>",
      "<ul>\\1</ul>",
      "<ol>\\1</ol>",
      );
		$tsmile = array(':-)',':-(','&lt;3',':-*',';-)',':-P',':-D');
            $tsmile_alter = array(':)',':(','&lt;3',':*',';)',':P',':D');
        $gsmile = array(
                  "<img src=graphics/images/smiles/0.jpg>",
                  "<img src=graphics/images/smiles/1.jpg>",
                  "<img src=graphics/images/smiles/2.jpg>",
                  "<img src=graphics/images/smiles/3.jpg>",
                  "<img src=graphics/images/smiles/4.jpg>",
                  "<img src=graphics/images/smiles/5.jpg>",
                  "<img src=graphics/images/smiles/6.jpg>",
                  "<img src=graphics/images/smiles/7.gif>",
                  );
        $gsmile_flat = array(
                  "<img src=graphics/images/smiles/flat/0.png>",
                  "<img src=graphics/images/smiles/flat/1.png>",
                  "<img src=graphics/images/smiles/flat/2.png>",
                  "<img src=graphics/images/smiles/flat/3.png>",
                  "<img src=graphics/images/smiles/flat/4.png>",
                  "<img src=graphics/images/smiles/flat/5.png>",
                  "<img src=graphics/images/smiles/flat/6.png>",
                  );