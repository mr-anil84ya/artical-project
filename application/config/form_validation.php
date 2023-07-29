<?php 
$config=[

    'add_article_rules'=>[
        [
            'field'=>'article_title',
            'label'=>'Article Title',
            'rules'=>'required|trim',
        ],
        [
            'field'=>'article_body',
            'label'=>'Article Body',
            'rules'=>'required|trim',
        ]

    ],
];
?>