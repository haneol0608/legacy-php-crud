# 📌 Legacy PHP CRUD System

> 레거시 PHP 환경에서 인증 · 계정관리 · 게시판 CRUD를 구현한 포트폴리오 프로젝트

---

## 🚀 프로젝트 개요

본 프로젝트는 레거시 PHP 기반으로 전형적인 CRUD 구조를 직접 설계·구현한 시스템입니다.  
단순 기능 구현이 아니라 **구조 설계, 인증 흐름, 유지보수성**에 중점을 두었습니다.

---

## ✔ 구현 범위

- 로그인 / 로그아웃 (세션 기반 인증)
- 회원가입
- 계정관리 (내 정보 수정 / 비밀번호 변경 / 회원탈퇴)
- 공지사항 게시판 CRUD
- 검색 및 페이징 UI `(ChatGPT)`
- 공공기관 스타일 UI 구성 `(ChatGPT)`

---

## 🧠 설계 포인트

### 1️⃣ include 기반 레이아웃 분리

- `header.php` / `footer.php` 분리
- 공통 레이아웃 구조 유지
- 유지보수성 향상

```php
include 'layout/header.php';
include 'layout/footer.php';
```
---

### 2️⃣ 화면과 처리 로직 분리

- board_write.php → 화면
- board_write_process.php → 처리
- POST 처리 파일 분리
- 책임 분리 (SRP)
- 코드 가독성 향상
- 유지보수성 확보

---

### 3️⃣ 세션 기반 인증 흐름 설계

- 로그인 성공 시 세션 생성
- 인증 필요 페이지 접근 제어
- 로그인 상태에 따라 메뉴 동적 분기
- 로그아웃 시 세션 파기

> 단순 로그인 구현이 아닌, **전체 페이지 흐름 제어 구조 설계**

---

## 📝 게시판 기능

### ✔ 목록
- 검색 (제목 / 작성자)
- 조회수 표시
- 페이징 UI

### ✔ 상세
- 조회수 증가 처리
- 수정/삭제 권한 제어

### ✔ 작성 / 수정
- 제목 / 내용 입력
- 기존 첨부파일 삭제 체크 UI
- 첨부파일 추가 UI 제공

---

## 🎨 UI 특징

- 공공기관 스타일 레이아웃
- 테이블 / 폼 일관성 유지
- `<label>`, `<caption>` 등 접근성 고려
- 반응형 기본 대응

---

## 🛠 기술 스택

| 구분 | 기술 |
|------|------|
| Backend | PHP (Legacy) |
| Database | MySQL |
| Frontend | HTML5, CSS3 |
| Script | JavaScript, jQuery |
| 인증 | Session |

---

## 📂 프로젝트 구조
```
legacy-php-crud/
├── index.php
├── portfolio.php
├── layout/
├── auth/
├── board/
├── db/
├── css/
└── README.md
```




