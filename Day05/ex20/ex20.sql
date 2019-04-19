SELECT genre.id_genre 'id_genre', genre.name 'name_genre', distrib.id_distrib 'id_distrib', distrib.name 'name_distrib', film.title 'title_film' FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE (film.id_genre >= 4 AND film.id_genre <= 8);