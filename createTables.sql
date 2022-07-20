CREATE OR REPLACE TABLE Cars (
    Id int PRIMARY KEY AUTO_INCREMENT,
    Make varchar(30),
    Model varchar(30),
    ProductionYear int,
    Odometer int,
    Price int
)