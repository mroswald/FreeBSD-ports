--- sw/Module_sw.mk.orig	2017-01-12 00:54:33 UTC
+++ sw/Module_sw.mk
@@ -62,13 +62,15 @@ $(eval $(call gb_Module_add_slowcheck_ta
     CppunitTest_sw_ooxmlfieldexport \
     CppunitTest_sw_ooxmlw14export \
     CppunitTest_sw_ooxmlimport \
-    CppunitTest_sw_ww8export \
-    CppunitTest_sw_ww8import \
+    $(if $(filter FREEBSD,$(OS)),, \
+        CppunitTest_sw_ww8export \
+        CppunitTest_sw_ww8import) \
     CppunitTest_sw_rtfexport \
     CppunitTest_sw_rtfimport \
     CppunitTest_sw_odfexport \
     CppunitTest_sw_odfimport \
-    CppunitTest_sw_uiwriter \
+    $(if $(filter FREEBSD,$(OS)),, \
+        CppunitTest_sw_uiwriter) \
     CppunitTest_sw_mailmerge \
     CppunitTest_sw_globalfilter \
 ))
