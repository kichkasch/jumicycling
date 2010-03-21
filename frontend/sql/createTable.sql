-- phpMyAdmin SQL Dump
-- version 3.2.5deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2010 at 09:46 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1-5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jumicycling`
--

-- --------------------------------------------------------

--
-- Table structure for table `cyclingstats`
--

CREATE TABLE IF NOT EXISTS `cyclingstats` (
  `workoutid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `distance` double NOT NULL,
  `duration` time NOT NULL,
  `maxspeed` double NOT NULL,
  `averagespeed` double NOT NULL,
  `comment` varchar(100) NOT NULL,
  PRIMARY KEY (`workoutid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;
