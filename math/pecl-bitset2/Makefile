# Created by: Greg Larkin <glarkin@FreeBSD.org>
# $FreeBSD$

PORTNAME=	bitset
PORTVERSION=	2.0.3
PORTREVISION=	1
CATEGORIES=	math
MASTER_SITES=	http://pecl.php.net/get/
PKGNAMEPREFIX=	pecl-
PKGNAMESUFFIX=	2
DIST_SUBDIR=	PECL

MAINTAINER=	sunpoet@FreeBSD.org
COMMENT=	PECL extension for manipulating bitsets

LICENSE=	PHP301
LICENSE_FILE=	${WRKSRC}/LICENSE

PORTSCOUT=	limit:^2\.

IGNORE_WITH_PHP=70 71
USES=		php:ext tar:tgz

.include <bsd.port.mk>
