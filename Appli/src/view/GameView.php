<?php


namespace applibd\view;


class GameView
{
    private $list;
    private $sel;

    function __construct($l, $select)
    {
        $this->list = $l;
        $this->sel = $select;
    }

    private function htmlUnJeu(){
        $nom = $this->list['nom'];
        $desc = $this->list['deck'];
        $id = $this->list['id'];

        $content = "<div class = content>";
        $content .= <<< EOF
    
    <table>
        <td>$id</td>
        <td>$nom</td>
        <td>$desc</td>
    </table>
</div>
EOF;
        return $content;
    }

    public function render() {
        switch ($this->sel) {
            case 'LIST_VIEW' : {
                $content = $this->htmlListeJeux();
                break;
            }
            case 'SINGLE_VIEW' : {
                $content = $this->htmlUnJeu();
                break;
            }
        }
        $html = <<<END
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
          <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <link rel="stylesheet" href="../../css/rubrique.css">
        <!-- CSS -->

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    </head>
    <!-- head -->

    <!-- body -->
    <body>
        <div class="content">
            $content
    </div>
    </body>
</html>
END;
        return $html;
    }
}
