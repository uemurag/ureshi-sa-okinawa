# uemura_okinawa

沖縄のカルチャーについての情報発信サイト

伝統的な沖縄文化と新しい沖縄文化を発信し沖縄の魅力を伝える

【サイト構成】

ビーチ

郷土料理

伝統芸能

伝統工芸

方言

ホテル

コンタクト・メッセージ

コメント

DBはmariaDB

CREATE comments;

USE comments;

【ファイル構成】

index.phpはメインページ

send.phpにformの投稿内容を送信してDBに保存

message.phpはお問い合わせ・メッセージ内容の確認テーブル

fetch_comments.phpはコメント欄（お問い合わせ・メッセージ）を表示させるためのDB接続

class="comments"は、 AJAXを使用してDBより最新のコメントを表示
