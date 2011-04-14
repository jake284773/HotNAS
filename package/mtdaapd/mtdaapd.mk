#############################################################
#
# mt-daapd
#
#############################################################

MTDAAPD_VERSION = svn-1586
MTDAAPD_SOURCE = mt-daapd-$(MTDAAPD_VERSION).tar.gz
MTDAAPD_SITE = http://nightlies.fireflymediaserver.org/nightlies/svn-1586/
MTDAAPD_CONF_OPT = \
	--prefix=/usr \
	--with-id3tag \
	--enable-sqlite3 \
	--enable-avahi \
	--enable-mdns \
	--enable-upnp \
	$(if $(BR2_PACKAGE_MTDAAPD_OGGVORBIS),--enable-oggvorbis,--disable-oggvorbis) \
	$(if $(BR2_PACKAGE_MTDAAPD_FLAC),--enable-flac,--disable-flac)
	#$(if $(BR2_PACKAGE_MTDAAPD_FFMPEG),--enable-ffmpeg,--disable-ffmpeg)
	
					
MTDAAPD_DEPENDENCIES = \
	sqlite \
	avahi \
	libid3tag \
	$(if $(BR2_PACKAGE_MTDAAPD_OGGVORBIS),libogg) \
	$(if $(BR2_PACKAGE_MTDAAPD_FLAC),flac)
	#$(if $(BR2_PACKAGE_MTDAAPD_FFMPEG))
	

	
define MTDAAPD_BUILD_CMDS
	$(MAKE) -C $(@D)
endef

define MTDAAPD_INSTALL_TARGET_CMDS
	$(MAKE) -C $(@D) install
	
	@if [ ! -f $(TARGET_DIR)/etc/init.d/S92mtdaapd ]; then \
		$(INSTALL) -m 0755 -D package/mtdaapd/S92mtdaapd $(TARGET_DIR)/etc/init.d/S92mtdaapd; \
	fi
endef

define MTDAAPD_UNINSTALL_TARGET_CMDS
	rm -f $(TARGET_DIR)/usr/bin/mt-daapd-ssc.sh
	rm -f $(TARGET_DIR)/usr/bin/wavstreamer
	rm -f $(TARGET_DIR)/usr/sbin/mt-daapd
	rm -Rf $(TARGET_DIR)/usr/share/mt-daapd
	rm -f $(TARGET_DIR)/etc/init.d/S40mtdaapd
endef

$(eval $(call GENTARGETS,package,MTDAAPD))
