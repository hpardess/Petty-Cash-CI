--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` int(11) NOT NULL,

  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `date_of_birth`, `phone_number`) VALUES
(1, 'Pardess', 'pardess@gmail.com', '1e0fa38366348f5a258b213b8199f4ab', '1990-07-22', 1233456789),
(2, 'Fareed', 'fareed@gmail.com', '287991bc0a634b67a92c2c5881d2abff', '1989-01-01', 2147483647),
(3, 'mb', 'mb@gmail.com', 'a9ddcf51419881bdee445181e32ede58', '1991-01-01', 232342343);


--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(2, 'Staff', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(3, 'Finance', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(4, 'HR', '2017-11-22 05:59:11', '2017-11-22 05:59:11');

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(2, 'user_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(3, 'user_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(4, 'user_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(5, 'role_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(6, 'role_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(7, 'role_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(8, 'role_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(9, 'request_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(10, 'request_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(11, 'request_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(12, 'request_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18');


--
-- Table structure for table `role_has_permission`
--

CREATE TABLE `role_has_permission` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY(`permission_id`, `role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(5, 2),
(9, 2),
(1, 3),
(5, 3),
(9, 3),
(1, 4),
(5, 4),
(9, 4);


--
-- Table structure for table `user_has_role`
--

CREATE TABLE `user_has_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY(`user_id`, `role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `user_has_role`
--

INSERT INTO `user_has_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4);

--
-- Table structure for table `temp_request`
--

CREATE TABLE `drafted_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date` date NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_per_unit` double NOT NULL,
  `total_cost` double NOT NULL,
  `workflow_status` varchar(50) NOT NULL DEFAULT 'Pendding',
  `user_id` int,

  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE drafted_request
ADD FOREIGN KEY (user_id) REFERENCES user(id);

--
-- Dumping data for table `request`
--

INSERT INTO `drafted_request` (`id`, `request_date`, `title`, `details`, `quantity`, `cost_per_unit`, `total_cost`, `workflow_status`, `user_id`, `created_at`, `updated_at`)
VALUES (1, '2018-03-01', 'Printer', 'A printer is required for finance department.', 3, 400, 1200, 'Pendding', 1, '2018-03-09 19:30:00', '2018-03-09 19:30:00');


--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date` date NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_per_unit` double NOT NULL,
  `total_cost` double NOT NULL,
  `workflow_status` varchar(50) NOT NULL DEFAULT 'Pendding',
  `user_id` int,

  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE request
ADD FOREIGN KEY (user_id) REFERENCES user(id);

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `request_date`, `title`, `details`, `quantity`, `cost_per_unit`, `total_cost`, `workflow_status`, `user_id`, `created_at`, `updated_at`)
VALUES (1, '2018-03-01', 'Printer', 'A printer is required for finance department.', 3, 400, 1200, 'Submitted', 1, '2018-03-09 19:30:00', '2018-03-09 19:30:00');

--
-- Table structure for table `request_transition`
--

CREATE TABLE `request_transition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transition` varchar(50) NOT NULL,
  `from_step` varchar(50) NOT NULL,
  `to_step` varchar(50) NOT NULL,

  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Table structure for table `system_registry`
--

CREATE TABLE `system_registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(50) NOT NULL,

  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*

{
   "id":"petty_cash",
   "name":"Workflow",
   "steps":[
      {
         "name":"Submitted",
         "transitions":[
            {
               "name":"Assign ODK Inspection",
               "toStep":"ODK Inspection Assigned"
            }
         ]
      },
      {
         "name":"ODK Inspection Assigned",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Start ODK Inspection",
               "toStep":"ODK Inspection Started"
            }
         ]
      }
    ]
}



{
   "id":"abc",
   "name":"Workflow",
   "imageUrl": "/artfWorkflow.png",
   "steps":[
      {
         "name":"Pendding",
         "transitions":[
            {
               "name":"Assign ODK Inspection",
               "toStep":"ODK Inspection Assigned"
            }
         ]
      },
      {
         "name":"ODK Inspection Assigned",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Start ODK Inspection",
               "toStep":"ODK Inspection Started"
            }
         ]
      },
      {
         "name":"ODK Inspection Started",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Finish ODK Inspection",
               "toStep":"ODK Inspection Finished"
            }
         ]
      },
      {
         "name":"ODK Inspection Finished",
         "transitions":[
            {
               "name":"Start GIS Verification",
               "toStep":"GIS Verification Started"
            }
         ]
      },
      {
         "name":"GIS Verification Started",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Approve by GIS",
               "toStep":"GIS Verification Finished"
            }
         ]
      },
      {
         "name":"GIS Verification Finished",
         "transitions":[
            {
               "name":"Start Report Processing",
               "toStep":"Report Processing Started"
            }
         ]
      },
      {
         "name":"Report Processing Started",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Finish Report Processing",
               "toStep":"Report Processing Finished"
            }
         ]
      },
      {
         "name":"Report Processing Finished",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Approve by Eng Manager",
               "toStep":"Report Approved (Eng Manager)"
            }
         ]
      },
      {
         "name":"Report Approved (Eng Manager)",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Approve by Eng TL",
               "toStep":"Report Approved (Eng TL)"
            }
         ]
      },
      {
         "name":"Report Approved (Eng TL)",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Approve by QC",
               "toStep":"Report Approved (QC)"
            }
         ]
      },
      {
         "name":"Report Approved (QC)",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Approve by Mon Tl",
               "toStep":"Report Approved (Mon TL)"
            }
         ]
      },
      {
         "name":"Report Approved (Mon TL)",
         "transitions":[
            {
               "name":"Reject",
               "toStep":"Rejected"
            },
            {
               "name":"Close",
               "toStep":"Closed",
               "resolutions":[
                  "Fixed",
                  "Won't Fix",
                  "Duplicate",
                  "Incomplete",
                  "Cannot Reproduce"
               ]
            }
         ]
      },
      {
         "name":"Closed",
         "transitions":[
            {
               "name":"Reopen",
               "toStep":"Reopened"
            }
         ]
      },
      {
         "name":"Reopened",
         "transitions":[
            {
               "name":"Reassign to GIS",
               "toStep":"ODK Inspection Finished"
            },
            {
               "name":"Reassign to Report Writers",
               "toStep":"GIS Verification Finished"
            },
              {
               "name":"Approve tl",
               "toStep":"Report Approved (Mon TL)"
            },
            {
               "name":"Close",
               "toStep":"Closed",
               "resolutions":[
                  "Fixed",
                  "Won't Fix",
                  "Duplicate",
                  "Incomplete",
                  "Cannot Reproduce"
               ]
            }
         ]
      },
      {
         "name":"Rejected",
         "transitions":[
            {
               "name":"Reassign to Engineer",
               "toStep":"ODK Inspection Assigned"
            },
            {
               "name":"Reassign to GIS",
               "toStep":"ODK Inspection Finished"
            },
            {
               "name":"Reassign to Report Writers",
               "toStep":"GIS Verification Finished"
            },
            {
               "name":"Close",
               "toStep":"Closed",
               "resolutions":[
                  "Fixed",
                  "Won't Fix",
                  "Duplicate",
                  "Incomplete",
                  "Cannot Reproduce"
               ]
            }
         ]
      }
   ]
}

*/
