drop schema if exists sf21_songs;
create schema sf21_songs default character set utf8 collate utf8_polish_ci;
grant all on sf21_songs.* to editor@localhost identified by 'secretPASSWORD';
flush privileges;