# Anime_Mylibrary
PHP自作

## 概要
アニメを一覧化し、見たいアニメをお気に入り登録したり番組表に登録できるサイトを作成しました。

管理ユーザと一般ユーザに分け、
それぞれでログインできるようにしています。



## 使い方
管理ユーザ

アニメの登録・更新・削除、ユーザ一覧を閲覧でき、編集・削除ができるようになっています。

テストアカウント(ユーザ名)：admin

メールアドレス→admin@co.jp

パスワード→admin1234

一般ユーザ

アニメ一覧、詳細の閲覧、お気に入り登録、番組表への登録、クリア、おすすめアニメの診断ができるようになっています。

テストアカウント：tester1

メールアドレス→test@test.com.jp

パスワード→aaaacccc

## 環境
XAMMP/MySQL/PHP/Laravel


## データベース

データベース名：Anime_app 

テーブル名：animes,anime_user,broadcasts,password_reset_tokens,roles,schedules,users

お使いのphpMyAdminに上のデータベースを作り、入っているDB.sqlをインポートしていただければお使いいただけるようになると思います。
