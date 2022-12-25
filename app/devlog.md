### 2022.12.21
[Coding. Setup]

Basically, I need a backend panel that allows our cabinets to create and modify events details. Then we can have a up to date CPS Website all the time.

I have first tried out the [`laravel-admin`](https://github.com/z-song/laravel-admin) package, but it turns out the repo no longer in maintenance anymore, so I switch to [`voyager`](https://github.com/the-control-group/voyager) which is also an admin panel.

Anyway, they allow us to speed up the process with pre-built Admin and 'BREAD' System. And I've set up the panel as well as the database.

We used MySQL database for this, so far it's used for storing our event informations. Here's the tables name:
- events
- event_types
- event_leaders
- event_coorganizers
- leaders
- organizers

Some of them are one to many relations and some of them are many to many relations, that's why we have so many tables.

---