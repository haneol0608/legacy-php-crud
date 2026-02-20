🚀 Legacy PHP CRUD System (Portfolio)

레거시 PHP 환경에서 인증/계정관리/게시판 CRUD를 직접 설계·구현한 프로젝트
구조 설계와 유지보수성을 고려한 서버 사이드 중심 CRUD 시스템

📌 1. 프로젝트 목적

이 프로젝트는 단순 CRUD 구현이 아니라,
레거시 PHP 환경에서의 구조 설계 능력과 인증 흐름 이해도를 보여주기 위해 제작되었습니다.

특히 다음에 집중했습니다:

세션 기반 인증 구조 이해

화면(include)과 처리(process) 로직 분리

유지보수를 고려한 파일 구조 설계

공공기관 스타일 UI/UX 구현

실제 실무에서 사용하는 전형적인 CRUD 패턴 재현

🧠 2. 설계 철학
① 레이아웃 분리 (include 기반 구조)
include 'layout/header.php';
include 'layout/footer.php';

공통 레이아웃 분리

유지보수 시 전체 화면 동시 수정 가능

실무에서 가장 많이 쓰는 구조 반영

② 화면과 로직 분리
board_write.php        → 화면
board_write_process.php → 처리

POST 처리 파일 분리

책임 분리 (SRP 원칙 적용)

코드 가독성 및 유지보수성 향상

③ 세션 기반 인증 흐름 설계

로그인 성공 시 세션 생성

인증 필요 페이지 접근 제어

로그아웃 시 세션 파기

로그인 여부에 따른 메뉴 분기

👉 단순 로그인 구현이 아닌, 전체 페이지 흐름 제어 구조 설계

🏗 3. 구현 기능
🔐 인증 시스템

로그인 / 로그아웃

세션 유지

접근 권한 제어

👤 계정관리

내 정보 수정

비밀번호 변경 (이중 확인 검증)

회원탈퇴

탭 UI + 해시 기반 상태 유지 UX 고려

👉 오류 발생 시 동일 탭 유지 처리 (UX 개선)

📝 게시판 CRUD

검색 (제목 / 작성자)

목록 (테이블 구조)

상세 (조회수 증가)

작성 / 수정 / 삭제

수정 시 기존 첨부파일 삭제 체크 UI

🎨 UI/UX 설계 포인트

공공기관 스타일 디자인

<label>, <caption>, aria 적용 (접근성 고려)

버튼 일관성 유지

반응형 기본 대응

UI만 구현된 기능은 명확히 표시

⚙ 기술 스택
구분	기술
Backend	PHP (Legacy)
Database	MySQL
Frontend	HTML5, CSS3
Script	JavaScript, jQuery
인증	Session 기반
🗂 프로젝트 구조
layout/     → 공통 레이아웃
auth/       → 인증/계정관리
board/      → 게시판 CRUD
db/         → DB 연결
css/        → 공통 스타일

👉 실무에서 사용하는 전형적인 “모듈 분리 구조”를 기반으로 설계

🧩 기술적 고민 & 해결
1️⃣ 탭 상태 유지 문제

비밀번호 변경 시 오류 발생하면 기본 탭으로 돌아가는 문제 발생

✔ 해결:

URL hash 기반 탭 상태 유지

브라우저 history 동작 이해 후 적용

2️⃣ include 경로 문제

상위/하위 디렉토리에서 CSS 경로 충돌 발생

✔ 해결:

상대경로 통일

구조 정리 후 include 기준 경로 설계

3️⃣ 파일 업로드 기능 범위 결정

포트폴리오 범위를 넘는 기능이었기 때문에:

✔ UI만 구현
✔ README에 명시
✔ 범위 명확화

👉 무리한 기능 확장보다 “완성도”를 선택

🚧 미구현 기능

파일 업로드 처리

이전글 / 다음글 SQL 처리

관리자 권한 분리

(의도적으로 포트폴리오 범위를 제한)

🔮 확장 가능성

CSRF 토큰 적용

비밀번호 해시 강화

REST API 구조 리팩토링

MVC 패턴 적용

관리자 권한 레벨 분리

파일 업로드 보안 처리

📈 이 프로젝트를 통해 보여주고 싶은 것

레거시 PHP 구조 이해도

인증 흐름 설계 능력

CRUD 기본기

UI/UX 세밀함

유지보수 가능한 구조 설계

👨‍💻 개발자 코멘트

이 프로젝트는 단순한 CRUD 구현이 아니라
“레거시 환경에서 어떻게 구조를 설계하고 유지보수성을 확보할 것인가”에 초점을 맞췄습니다.

Directory
project/
│
├── index.php
├── portfolio.php
│
├── layout/
│   ├── header.php
│   └── footer.php
│
├── auth/
│   ├── login.php
│   ├── sign.php
│   ├── account.php
│   └── account_process.php
│
├── board/
│   ├── board.php
│   ├── board_view.php
│   ├── board_write.php
│   ├── board_edit.php
│   └── board_process.php
│
├── db/
│   └── dbconnect.php
│
└── css/
    └── gov.css