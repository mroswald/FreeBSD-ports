# Created by: Sunpoet Po-Chuan Hsieh <sunpoet@FreeBSD.org>
# $FreeBSD$

PORTNAME=	gupnp
PORTVERSION=	1.0.0
PORTREVISION=	1
CATEGORIES=	net pear
MASTER_SITES=	http://pecl.php.net/get/
PKGNAMEPREFIX=	pecl-
DIST_SUBDIR=	PECL

MAINTAINER=	sunpoet@FreeBSD.org
COMMENT=	GUPnP wrapper extension

LICENSE=	PHP301

LIB_DEPENDS=	libgupnp-1.0.so:net/gupnp

IGNORE_WITH_PHP=70 71
USES=		php:ext pkgconfig tar:tgz

post-patch:
	@${REINPLACE_CMD} -e 's| -ldl||g' ${WRKSRC}/config.m4

.include <bsd.port.mk>
