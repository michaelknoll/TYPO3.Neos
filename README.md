TYPO3.Neos Package
==================

This is the TYPO3.Neos Package.


Installation
============

See [neos.typo3.org/develop/download.html](http://neos.typo3.org/develop/download.html)


Documentation
=============

Integrator Documentation
------------------------

See [neos.typo3.org/learn/documentation.html](http://neos.typo3.org/learn/documentation.html)


Developer Documentation
-----------------------

### JavaScript

For building the compiled JavaScript files, see [Scripts/README.md](Scripts/README.md).

For working with non-minified JavaScripts in development, add the following settings to your `project_root/Configuration/Settings.yaml` file

    TYPO3:
      Neos:
        userInterface:
          loadMinifiedJavascript: false
