# radio_report_app

https://radirepo.com

# radio_report_app とは

視聴したラジオ番組に対するメモを残すことができるアプリです。
私はラジオを聞くことが趣味なのですが、働き始めたことでながら聞きする場面が増えました。
「前も同じこと言っていた気がするけど、いつの放送だったか忘れてしまった」
「年末の振り返り放送の際、以前の放送の話題が出たもののいつ頃の話題か思い出せない」
といったケースが増えてしまいました。
これを防ぐため、視聴メモを残し、過去の情報を振り替えれる仕組みを作ろうと考えました。

# radio_report_app の使い方

・番組を登録することが出来、自分の聞いたことのある番組についての情報を調べることが出来ます。
・過去の放送内容を振り返りたいときに、番組及び投稿を検索する事ができます。
・お気に入り番組を登録/確認できるので。新しい番組の開拓ができます。

# 作成機能

○ ラジオ番組関連
・情報登録・編集・詳細・削除（削除は権限者のみ）
・登録済み番組一覧表示

![Vue一覧表](https://user-images.githubusercontent.com/100508552/201910619-4839c531-6b02-4c33-97fa-9bec3b655fdf.gif)

・お気に入り番組登録・解除

![radirepo com_radios_1(iPad Mini)](https://user-images.githubusercontent.com/100508552/201910056-0bffc877-762f-466b-aedf-7a181ca4740c.png)

○ 視聴メモ関連
・情報登録・編集・詳細・削除（削除は投稿者のみ）
・投稿済み視聴メモ一覧表示

![radirepo com_articles_1_edit(iPad Mini)](https://user-images.githubusercontent.com/100508552/201910216-b0d301f3-c82f-4dff-b4ad-c6e51315d540.png)

![radirepo com_articles(iPad Mini)](https://user-images.githubusercontent.com/100508552/201910413-441db9af-01a6-4482-9f2d-921423672073.png)

○ ユーザー認証関連
・ユーザー登録(Google ログイン)
・ログイン/ログアウト
・パスワードリセット
・プロフィール編集

○ その他
・キーワード検索機能(登録済み番組、投稿済み視聴メモ)
・ソート機能(登録済み番組)
・レスポンシブデザイン対応

# 開発環境

○ フロントエンド
HTML/CSS/MDBootstrap4
Vue.js 2.6.12

○ バックエンド
PHP 8.1.9
Laravel 9.11.0

○ インフラ
MySQL 8.0.30
nginx 1.20.2
Docker 20.10.17
Composer 2.2.7
AWS(VPC,EC2,RDS,Route53,ELB)
