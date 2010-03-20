-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2010 at 11:51 AM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

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
  `duration` varchar(20) NOT NULL,
  `maxspeed` double NOT NULL,
  `averagespeed` double NOT NULL,
  `comment` varchar(100) NOT NULL,
  PRIMARY KEY (`workoutid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;
