run:
	if test -d "/data/tools" ; \
	then echo 'success';  \
	else \
	echo 'please install tools'; \
	cd /data/; sudo git clone git@github.com:whenjonny/tupppai-tools.git tools ; \
	fi ;
	if test -d "/data/storage" ; \
	then echo 'success';  \
	else echo 'please install tools'; \
	cd /data/; sudo git clone git@github.com:whenjonny/tupppai-storage.git storage;  \
	fi ;
	/bin/sh /data/tools/supervisor/supervisor.sh start ;
