# InOut Connectify (Village Connectify)
<!--## Inspiration-->


## What it does
In simpler terms, it creates a local interweb which enables the rural areas' residents to consume internet data without even getting connected to the internet.
##### Watching educational stuff on the interweb, without internet (on client side)
![view video](http://sahildua.com/inout-img/videos.png)
If 100 people from a village want to access some particular educational videos, rather than making all of 100 of them to download those videos at their own ends, central hub will have those videos saved on the system. Anyone who is connected to the local network of the central hub, will be able to access and watch those videos as if they were present on their own local system.
##### Listening to people's requests/complaints over the interweb, without internet
![messages](http://sahildua.com/inout-img/messages.png)
Let's consider a scenario, where someone wants to access some videos which aren't already available on the central hub. In such a case, anyone connected on the local network can raise a request for any new material and the person handling the central hub will be able to download new stuff that he/she wants to make available to people.
This interweb can also be used to lodge complaints to the village head over the same locally shared network.
##### Communicating with each other over the interweb, without internet
Village Connectify also enables villagers to broadcast (send to all) messages to all other people on the network. They can also communicate with each other via private messaging, that too without using internet at all.
##### Accessing cached websites over the interweb, without internet
![add website](http://sahildua.com/inout-img/website.png)
All connected users can also access websites which the admin has already cached on it's own system. Users can also request for a new website to be cached. We have also added a web interface utility for the admin, to recursively download the entire requested website.

## How I built it
##### Central Hub (acting as server for the interweb)
We created a system as a server which will act as a server for the entire interweb. Any content to be shared with the interweb will be present in this system. This is the only device(system) that needs to be connected to internet whenever something new is to be downloaded. The entire architecture will still be up even if this system loses internet access, just that it won't be able to download any new material. It can still provide all the inter-connected devices data for consumption without internet connection.
##### Client Side application
We created a web application that's accessible from literally any device that supports a browser. The web application accesses the data available on the local server and consumes it as if it's available on it's own machine only. Client web application also enables users to communicate with the admin as well as other registered users. Users don't need to register in order to consume videos / cached websites.

## Challenges I ran into
##### Architecture Setup of interweb
We tried different tools available for sharing localhost over the same network, finally stuck with the wifi sharing over the same network.
##### Coming up with different use cases / utilities using the interweb
We did extensive discussions and brainstorming over the different utilities we could provide using this locally connected interweb.
##### Content Moderation
To moderate the content being sent by users over messages, we have designed our own customized admin dashboard, where admin can see all the requests that have been raised so far, or any kind of messages that people have sent to the admin, specifically. Admin also possesses the ability to delete any offensive content being transmitted.

<!--## Accomplishments that I'm proud of-->

## What's next for Village Connectify
##### Automated Content Moderation
As of now, there has to be one person controlling each central hub. Going forward, we can even eliminate this person's role to certain limit by adding automated content moderation using machine learning algorithms. Training of the model can be done by observing the patterns and user actions taken by this person when using in manual mode of moderation.
##### 2-way content sharing
We can later enable 2-way sharing of files in which users can even upload files which they want to be accessible on the interweb (this content will be suitably moderated, of course!).
