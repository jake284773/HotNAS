#############################################################
#
# sshpass
#
#############################################################

SSHPASS_VERSION = 1.04
SSHPASS_SOURCE = sshpass-$(SSHPASS_VERSION).tar.gz
SSHPASS_SITE = http://$$(BR2_SOURCEFORGE_MIRROR).dl.sourceforge.net/sourceforge/sshpass
SSHPASS_CONF_OPT = --prefix=/usr



define SSHPASS_INSTALL_TARGET_CMDS
	$(INSTALL) -D -m 0755 $(@D)/sshpass $(TARGET_DIR)/usr/bin/sshpass
endef

define SSHPASS_UNINSTALL_TARGET_CMDS
	rm -f $(TARGET_DIR)/usr/bin/sshpass
endef

$(eval $(call AUTOTARGETS,package,sshpass))
