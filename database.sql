create table runs (id INT NOT NULL AUTO_INCREMENT KEY, date_time DATETIME, km DOUBLE, time_mm INT, time_ss INT, avg_heart_rate INT, max_heart_rate INT, kcal_watch INT, health_zone_time_mm INT, health_zone_time_ss INT, fitness_zone_time_mm INT, fitness_zone_time_ss INT, power_zone_time_mm INT, power_zone_time_ss INT, kcal_runkeeper INT, climb_m INT, final_sprint_s INT, shoe_id INT, run_type_id INT, route_id INT, route_description TEXT, route_link TEXT, splits TEXT, notes TEXT);

create table splits (id INT NOT NULL AUTO_INCREMENT KEY, run_id INT, lap_number INT, time_hh INT, time_mm INT, time_ss FLOAT);

create table shoes (id INT NOT NULL AUTO_INCREMENT KEY, name TEXT, description TEXT, mileage DOUBLE);

create table run_types (id INT NOT NULL AUTO_INCREMENT KEY, name VARCHAR(64), description TEXT);

create table routes (id INT NOT NULL AUTO_INCREMENT KEY, name VARCHAR(64), description TEXT, route_link TEXT);

