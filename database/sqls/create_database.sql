create database lvblog;

use lvblog;


select * from posts;
select * from comments;
select * from users;

drop table comments;

insert into comments
(
	id,
    body,
    created_at,
    updated_at
)
values
(
	13,
    'Teste',
    now(),
    now()
);

insert into posts 
(
	title,
    body,
    created_at,
    updated_at
)
values
(
	"Post 1",
    "Corpo do post 1",
    now(),
    now()
);

insert into posts 
(
	title,
    body,
    created_at,
    updated_at
)
values
(
	"Post 3",
    "Corpo do post 3",
    now(),
    now()
)