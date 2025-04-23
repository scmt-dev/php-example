create table if not exists users (
    id int primary key auto_increment,
    full_name varchar(255),
    email varchar(255),
    password varchar(255),
    created_at timestamp default CURRENT_TIMESTAMP
);

create table if not exists posts (
    id int primary key auto_increment,
    content text,
    user_id int,
    created_at timestamp default CURRENT_TIMESTAMP,
    foreign key (user_id) references users(id)
);

create table if not exists comments (
    id int primary key auto_increment,
    content text,
    user_id int,
    post_id int,
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (user_id) references users(id),
    foreign key (post_id) references posts(id)
);

create table if not exists likes (
    id int primary key auto_increment,
    user_id int,
    post_id int,
    created_at timestamp default CURRENT_TIMESTAMP,
    foreign key (user_id) references users(id),
    foreign key (post_id) references posts(id)
);

create table if not exists shares (
    id int primary key auto_increment,
    user_id int,
    post_id int,
    created_at timestamp default CURRENT_TIMESTAMP,
    foreign key (user_id) references users(id),
    foreign key (post_id) references posts(id)
);

create table if not exists friends (
    id int primary key auto_increment,
    friend_user_id int,
    user_id int,
    is_confirmed boolean default false,
    created_at timestamp default CURRENT_TIMESTAMP,
    foreign key (friend_user_id) references users(id),
    foreign key (user_id) references users(id)
);

create table tasks(
    id int primary key auto_increment,
    title text not null,
    done boolean default 0
)


create table customers(
    id int primary key auto_increment,
    sex varchar(1) not null,
    name varchar(60) not null,
    phone varchar(20) not null,
    email varchar(60) null,
    address varchar(255) null,
    created_at timestamp default CURRENT_TIMESTAMP
);

create table contracts (
    id int primary key auto_increment,
    title varchar(255) not null,
    detail text null,
    file varchar(255) null,
    customer_id int not null,
    start_date date null,
    expiry_date date null,
    status varchar(255) null default 'pending', -- pending, active, expired, cancelled
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (customer_id) references customers(id)
);



CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_number VARCHAR(20) UNIQUE NOT NULL,
    account_name VARCHAR(100) NOT NULL,
    balance DECIMAL(18,2) NOT NULL DEFAULT 0.00,
    currency VARCHAR(3) NOT NULL DEFAULT 'LAK',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    type ENUM('deposit', 'withdraw', 'transfer_in', 'transfer_out', 'fee', 'penalty', 'interest', 'other') NOT NULL,
    amount DECIMAL(18,2) NOT NULL CHECK (amount > 0),
    description VARCHAR(255) DEFAULT NULL,
    related_account_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (account_id) REFERENCES accounts(id),
    FOREIGN KEY (related_account_id) REFERENCES accounts(id)
);
