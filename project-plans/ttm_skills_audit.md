Title: TTM Skills and Interests Audit
Author: Chris Gardiner-Bill
CSS:   ../../templates/stylesheets/ttm.css
  
# TTM Skills and interests audit proposal

{{TOC}}

## Introduction

### Purpose
TTM is seeking to audit our members (and the Maroondah community in general) for their skills and interests because we currently have very little insight into the broader TTM membership and we are often unable to find skilled persons and subject matter experts to undertake projects relating to our goals and objectives. 

We would like to be in the position to encourage the sharing of knowledge between members by using gathered information to create a skills swap platform accessible to members. 

#### Out of Scope ####

Out of scope items include:

* Organisations. 
* Individuals identified as Councillors and people employed by the Maroondah City Council.
* Transition Hubs.
* Database management
* Member notes
* new memberships

**Organisations** and **Maroondah City Council** have been identified primarily as stakeholders and will be managed in a separate process to members.

**Transition Hubs** are defined as a sub-group of TTM as per correspondence with Michael Down. They will be addressed in a future project.

**Database management for users** will be achieved through the creation of a TTM portal and created later in additional projects.

Ability to add **notes** to members will be added as part of the *portal project*.

~~**New memberships** will be added to a later project. If anyone tries to input data without a valid email (valid format and entry in database) the system will display an error message.~~

**New memberships** Individuals can sign up directly using a web form.

#### Membership database

This project opens up opportunities for creating a centralised membership database which can be used to manage members in one location. A centralised database paves the way to:

* Communication management and targeted communication
* Skills/interests/availability (this project)
* Demographic information
* Membership benefits
* Ability to produce reports and evidence of members for grants and other official purposes

A members database can be linked to other potential databases such as TTM projects, asset/book sharing etc.

A members database would also be a requirement for a member extranet or similar device where members can log in to share and collaborate.



### Project Timelines

The project can either be a one-off exercise, periodic or ongoing (whereby the form remains active year round).

A realistic time line, based on the action plan (below) could see project execution begin during May 2016.


### Target audience

The audit is initially targeted to the TTM membership list and they will be targeted through direct mail (email). TTM's core group currently has in its possession approximately 400 names, email addresses and other personal information.

There's also the potential to use social media or the TTM website to open up the audit to non-members. This could also be used to attract additional members.



## Privacy

TTM recognises that all information gathered will be subject to privacy laws and TTM must **develop a privacy policy**. Access to this information must be strictly controlled and not used for any purpose beyond what is agreed upon and consented.

## Survey design

Survey design refers to the information we want to collect. We need to develop a list of skills and interests first so they can be added to the form.

We also need to decide on what personal information to collect and provide 'action' choices such consenting to be contacted etc.

### Form

The following is an example of how the form will be displayed.

```


My interests:

Check all that apply:

Renewable Energy []
Food: security, production, transportation []
Transport and Cycling []
Housing, Planning and Building Regulations []
The Arts []
Trees and Parks []
Waste Management []
Water Management []
Recycling and reuse []


***

My skills to contribute

Communication, marketing and publicity []
Project and Business Management []
Administration and Clerical []
Grant writing []
Graphic design []
Events management []
Website and database development []


***

My Transition Story

+---------------------------+
|				|
|				|
|				|
|				|
|				|
+---------------------------+

[reCAPTCHA]

[Clear] [Submit]

```

### Description of fields ###

**Jun 2016** The old list of fields have been removed. Interests and skills are now stored directly in the database to make it easier to change and add more. The form it automatically generated.



## Implementation

### Project plan

| Action	| Lead	| Authorisation	| Start Date	| End Date	|  
|  ------	| ------	| ------	| ------	|  
| Develop a TTM privacy policy	|  Chris Gardiner-Bill	| Pam French	| 16/04/2016		| TBA |  	 
| Develop project plan	| Chris Gardiner-Bill	| Pam French	| 9/4/2016	| 15/4/2016 |  
| Develop information schema	| Chris Gardiner-Bill	| Pam French		| 10/4/2016|  TBA|
| Design form	| Chris Gardiner-Bill	| Pam French		|10/4/2016|  TBA|
| Implement form	| Chris Gardiner-Bill	| Pam French		|10/4/2016|   TBA |
| Internal testing	| Chris Gardiner-Bill	| Core Group	| TBA		|TBA | 
| Market/advertise audit	| TTM Communications Officer	| Pam French		|TBA| TBA |  
| Launch project	| TTM Programme Officer	| Pam French	| 23/06/2016		| 26/06/2016|  
| Post-launch review/lessons learnt	| TTM Programme Officer	| Pam French	| 17/07/2016	| 17/07/2016|  
| On-going maintenance	| Chris Gardiner-Bill	| Pam French	| TBA		|TBA|
| Develop front-end report | Chris Gardiner-Bill | Pam French	| 22/06/2016 | 26/06/2016 |
[Skills Audit project plan]

### Capturing data

#### Initial Thoughts ####

The easiest and most efficient way of capturing data is via an online form. This could be a Wordpress plugin, Google Form or a custom application. If using our own web form, it must be secured with reCaptcha and (preferably) encrypted in transport (TLS).

Alternatively, we can create PDF forms (paper and digital) and manually handle data, though I don't recommend this.

Captured data should be stored in a database so it can be easily reused. Alternatively, if project timelines are short, data could be serialised (i.e. CSV, JSON, XML) and dumped to file or sent to an email address for later processing. This part really depends on the technology stack chosen and the project timelines.

#### Update -- May 2016 ####

Development is underway using a standalone PHP-powered form and MySQL database. See *Development* below for more information.

### Development ###

Development of the skills audit will be done in PHP, a server-side scripting language that is capable of displaying and processing forms. PHP has has rich database support.

Project components to be developed include:

* Front-end: a form created with HTML, CSS and Javascript, accessed by users via their browser
* Back-end: a program to hand the submitted form and write the data to a database
* Database: persistent store for captured data. Will leverage the existing MySQL databased currently used by the TTM.org.au Wordpress instance.

### Database Schema ###

The database schema describes the structure of the database that will store the survey data.

For a minimum viable product, we require the following tables:

* members
* skills
* member:skills
* interests
* member:interests
* notes

#### Members ####

The ttm_members table will contain information about individual members.


| Field	| Description	| Type	|  
|  ------	| ------	| ------	|  
| ID	| Unique identifier	| INT (Primary, AutoIncrement)  |
| Firstname	| Member's name 	| TEXT |  
| Lastname	| Member's last name	| TEXT	| 
| Address	| Member's street address	| TEXT	|  
| Postcode	| Members postcode 	| TEXT	|  
| Suburb	| Member's suburb	| TEXT	|  
| Email	| Member's email address	| TEXT	|  
| Phone	| Member's phone number	| TEXT		|  
| Website	| Member's blog or website	| TEXT|  
| Facebook	| Member's Facebook page	| Text	|  
| Twitter	| Member's Twitter account	| Text	|  
| Membership Status	| The Member's current status	| TEXT	|  
| Subscription	| Notes if the member has consented to be contacted by TTM| TEXT	| |
[ttm_members table schema]  

**Note**: Password field added to support authentication.

#### Skills ####

The ttm_skills table will contain the skills.

| Field	| Description	| Type	|  
|  ------	| ------	| ------	|  
| ID	| Unique Identier	| INT (Primary, AutoIncrement)  |
| Skill	| Name of the skills	| Text	| 
| Description	| A description of the skill	| TEXT	|
| Category	| Foreign key (Categories:ID)	| INT	| 
[ttm_skills table schema]

#### Members:Skills ####

A relational table to match members to skills. Members can have many skills.

| Field	| Description	| Type	|  
|  ------	| ------	| ------	|  
| ID	| Unique identifier	| INT (Primary, AutoIncrement) |  
| Member	| Foreign key (Members:ID)	| INT |  
| Skill	| Foreign key (Skills:ID)	| INT |  
[ttm_members:skills table schema]

#### Interests ####

This table will contain the interests.

| Field	| Description	| Type	|  
|  ------	| ------	| ------	|  
| ID	| Unique Identier	| INT (Primary, AutoIncrement)  |
| Interest	| Name of the interest	| Text	|  
| Category	| Foreign key (Categories:ID)	| INT	| 
| Description	| A description of the skill	| TEXT	| 
[Skills table schema]

#### Members:Interest ####

A relational table to match members to interests. Members can have many interests.

| Field	| Description	| Type	|  
|  ------	| ------	| ------	|  
| ID	| Unique identifier	| INT (Primary, AutoIncrement) |  
| Member	| Foreign key (Members:ID)	| INT |  
| Interest	| Foreign key (Interest:ID)	| INT |  
[Members:skills table schema]  


#### Member Notes ####

This table will hold notes about members. Notes are used to add additional information about a member. Notes will be automatically created by the system when the following event is triggered:

* A new member is created
* A password reset is requested
* A member updates their personal information
* A member completes the skills audit

| Field	| Description	| Type |  
|  ------	| ------	| ------	|  
| ID	| Unique identified	| INT (Primary, AutoIncrement)  |  
| User	| Foreign Key (Members:ID)	| INT	|
| Note	| The note text	| TEXT	|  
| Creator	| The name of the creator. Defaults to system	| TEXT	|  
| Created Date	| The date the note was created	| DATETIME	|  
| Edited Date	| The date the note was last edited	| DATETIME	|  |  
[Member notes schema] 


