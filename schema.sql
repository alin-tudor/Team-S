DROP DATABASE project_main;
CREATE DATABASE project_main;
Use project_main;

--
-- Table structure for table `Investigations`
--

CREATE TABLE `Investigations` (
  `ID` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `Bili T/D` tinytext NOT NULL,
  `AST` tinytext NOT NULL,
  `ALT` tinytext NOT NULL,
  `ALP` tinytext NOT NULL,
  `GGT` tinytext NOT NULL,
  `Prot` tinytext NOT NULL,
  `Alb` tinytext NOT NULL,
  `CK` tinytext NOT NULL,
  `Hb/Hct` tinytext NOT NULL,
  `WCC` tinytext NOT NULL,
  `Neutro` tinytext NOT NULL,
  `Platelets` tinytext NOT NULL,
  `CRP` tinytext NOT NULL,
  `ESR` tinytext NOT NULL,
  `PT/INR` tinytext NOT NULL,
  `APTR` tinytext NOT NULL,
  `Fibrinogen` tinytext NOT NULL,
  `Cortisol` tinytext NOT NULL,
  `Urea` tinytext NOT NULL,
  `Creatinine` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `ID` int(11) NOT NULL,
  `nhs_number` int(11) NOT NULL,
  `first_name` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `home_address` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postcode` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `home_phone` varchar(32) NOT NULL,
  `mobile_phone` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gp_address` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gp_phone` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`ID`, `nhs_number`, `first_name`, `last_name`, `date_of_birth`, `sex`, `home_address`, `postcode`, `home_phone`, `mobile_phone`, `gp_address`, `gp_phone`) VALUES
(1, 4567, 'Ligia', 'Micu', '2020-02-22', 'f', 'Great Dover Street 165', 'SE14XA', '4567', '45678', 'Great Dover Street 165', '54678');

-- --------------------------------------------------------


--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `date`, `time`) VALUES
(1, 2, '2020-03-12', '02:00:00'),
(2, 3, '2020-03-12', '03:00:00'),
(4, 3, '2020-03-13', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Referral`
--

CREATE TABLE `Referral` (
  `ID` int(11) NOT NULL,
  `patient_ID` int(11) NOT NULL,
  `consultant_name` varchar(32) NOT NULL,
  `consultant_specialty` varchar(32) NOT NULL,
  `organisation_name` varchar(32) NOT NULL,
  `organisation_hospital_no` int(32) NOT NULL,
  `bleepnumber` tinytext NOT NULL,
  `parent_aware` tinyint(1) NOT NULL,
  `interpreter_needed` tinyint(1) NOT NULL,
  `interpreter_language` tinytext,
  `kch_doctor_name` tinytext NOT NULL,
  `date_time` datetime NOT NULL,
  `current_issue` mediumtext NOT NULL,
  `history_of_present_complaint` mediumtext NOT NULL,
  `family_history` mediumtext NOT NULL,
  `current_feeds` text,
  `medications` text,
  `other_investigations` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userLevel` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) DEFAULT '',
  `name` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);


--
-- Indexes for table `Investigations`
--
ALTER TABLE `Investigations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `patient_ID` (`patient_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nhs_number` (`nhs_number`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Referral`
--
ALTER TABLE `Referral`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Foreign Key(patient)` (`patient_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Investigations`
--
ALTER TABLE `Investigations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  
--
-- AUTO_INCREMENT for table `Referral`
--
ALTER TABLE `Referral`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Referral`
--
ALTER TABLE `Referral`
  ADD CONSTRAINT `Foreign Key(patient)` FOREIGN KEY (`patient_ID`) REFERENCES `Patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
