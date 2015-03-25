TYPO3.Neos Package
==================

What is TYPO3.Neos?
-------------------

TYPO3 Neos is the next-generation open source content management system made by the TYPO3 community. Neos is based on the PHP framework [TYPO3 Flow](http://flow.typo3.org).

This repository holds the Neos package for Flow.

For further information about TYPO3 Neos visit the [project website](http://neos.typo3.org).


Requirements & Installation
---------------------------

See [neos.typo3.org/develop/download.html](http://neos.typo3.org/develop/download.html) for further details on requirements and the setup of Neos.


Documentation
-------------

See [neos.typo3.org/learn/documentation.html](http://neos.typo3.org/learn/documentation.html) for a "Getting Started" and an overview of all the available documentation for Neos.


Contributing
------------

### Work In An Inspiring Team!

We're always looking for new contributors. If you can help in one of the following areas, please get in touch with us!

* Code
* Testing
* Usability
* Documentation
* Feature ideas
* Anything else useful for TYPO3 Neos
* We're looking forward to hearing from you!

### Offer contribution

Want to offer your contribution? Please get in touch with us on mailing lists or IRC (irc.freenode.net, channel #typo3-flow or #typo3-neos) so we can find someone to mentor your contribution.

For further information on contributing to the project, please visit [neos.typo3.org/contribute.html](http://neos.typo3.org/contribute.html)

Package Documentation
=====================

JavaScript
----------

For building the compiled JavaScript files, see [Scripts/README.md](Scripts/README.md).

For working with non-minified JavaScripts in development, add the following settings to your `project_root/Configuration/Settings.yaml` file

    TYPO3:
      Neos:
        userInterface:
          loadMinifiedJavascript: false
