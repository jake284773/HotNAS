#############################################################
#
# Build the iso96600 root filesystem image
#
# Cannot be converted to the ROOTFS_TARGET infrastructure, because of
# the temporary construction in ISO9660_TARGET_DIR.
#
#############################################################

ISO9660_TARGET_DIR=$(BUILD_DIR)/iso9660
ISO9660_BOOT_MENU:=$(call qstrip,$(BR2_TARGET_ROOTFS_ISO9660_BOOT_MENU))
ISO9660_OPTS:=

ifeq ($(BR2_TARGET_ROOTFS_ISO9660_SQUASH),y)
ISO9660_OPTS+=-U
endif

$(BINARIES_DIR)/rootfs.iso9660: host-cdrkit host-fakeroot linux26 rootfs-ext2 syslinux
	@$(call MESSAGE,"Generating root filesystem image rootfs.iso9660")
	mkdir -p $(ISO9660_TARGET_DIR)
	cp $(BINARIES_DIR)/isolinux.bin $(ISO9660_TARGET_DIR)
	cp $(ISO9660_BOOT_MENU) $(ISO9660_TARGET_DIR)/isolinux.cfg
	cp $(LINUX26_IMAGE_PATH) $(ISO9660_TARGET_DIR)/kernel
	cp $(BINARIES_DIR)/rootfs.ext2.gz $(ISO9660_TARGET_DIR)/initrd.gz
	# Use fakeroot to pretend all target binaries are owned by root
	rm -f $(FAKEROOT_SCRIPT)
	touch $(BUILD_DIR)/.fakeroot.00000
	cat $(BUILD_DIR)/.fakeroot* > $(FAKEROOT_SCRIPT)
	echo "chown -R 0:0 $(ISO9660_TARGET_DIR)" >> $(FAKEROOT_SCRIPT)
	# Use fakeroot so mkisofs believes the previous fakery
	echo "$(HOST_DIR)/usr/bin/genisoimage -R -b isolinux.bin -no-emul-boot " \
		"-boot-load-size 4 -boot-info-table -o $@ $(ISO9660_TARGET_DIR)" \
		>> $(FAKEROOT_SCRIPT)
	chmod a+x $(FAKEROOT_SCRIPT)
	$(HOST_DIR)/usr/bin/fakeroot -- $(FAKEROOT_SCRIPT)
	-@rm -f $(FAKEROOT_SCRIPT)
	-@rm -rf $(ISO9660_TARGET_DIR)

rootfs-iso9660: $(BINARIES_DIR)/rootfs.iso9660

#############################################################
#
# Toplevel Makefile options
#
#############################################################
ifeq ($(BR2_TARGET_ROOTFS_ISO9660),y)
TARGETS+=rootfs-iso9660
endif
