### 2022.12.23-24
[Deploy]

Deployed the backend on my personal server before on the CPS server, kinda tricky because it's the first time. Have some issues with apache and PHP, most likey the PHP is not configured right, some modules are not installed and enabled.

After seeing the backend works on my server, I tried put it on the CPS server. However, it took us two days to do so, mainly because the server is alreay running lower version PHP. And also we need a subdomain to point to the laravel backend. It took so much time, but eventually managed to do so.

---

### 2022.12.22
[Coding]

Set up all the Models needed and defined the relationships in laravel, something like `hasOne`, `hasMany`, `belongsTo` and `belongsToMany`. It's quite handy to define the multi relationships in laravel with `Eloquent Model`.

Set up the API routes for returning the events info:
- `api/events` => getting all the events
- `api/events/{id}` => getting specific event by Id

Also added some cache for the API routes, so that it don't need to query the database everytime.

---

### 2022.12.21
[Coding, Setup]

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

Some of them are one to many relationships and some of them are many to many relationships, that's why we have so many tables.

---