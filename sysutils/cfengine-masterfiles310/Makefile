# Created by: cy@FreeBSD.org
# $FreeBSD$

PORTNAME=	cfengine-masterfiles
PORTVERSION=	3.10.1
CATEGORIES=	sysutils
MASTER_SITES=	https://cfengine-package-repos.s3.amazonaws.com/tarballs/

MAINTAINER=	cy@FreeBSD.org
#		gjb@FreeBSD.org is also committer for this port
#		skreuzer@FreeBSD.org is also committer for this port
COMMENT=	cfengine sample policies for installations and upgrades

LICENSE=	GPLv3

CPE_VENDOR=	gnu

.if !defined(MASTERDIR)
PKGNAMESUFFIX=	310
.endif

RUN_DEPENDS=	cf-agent:sysutils/cfengine${PKGNAMESUFFIX}

FETCH_BEFORE_ARGS=	-o ${DISTDIR}/${DISTFILES}

CONFLICTS=	cfengine-masterfiles[6-9]*

MAKE_JOBS_UNSAFE=	yes
USES=		cpe gmake
HAS_CONFIGURE=	yes
EXAMPLESDIR=	${PREFIX}/share/examples/cfengine-masterfiles
CONFIGURE_ARGS=	--prefix=${EXAMPLESDIR}

.include <bsd.port.mk>
