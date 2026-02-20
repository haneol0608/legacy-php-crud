# 🚀 Legacy PHP CRUD System (Portfolio)

> 레거시 PHP 환경에서 인증 · 계정관리 · 게시판 CRUD를 직접 설계·구현한 프로젝트  
> 구조 설계와 인증 흐름 이해도를 보여주기 위한 포트폴리오

---

## 📌 1. 프로젝트 목적

이 프로젝트는 단순 CRUD 구현이 아니라,  
**레거시 PHP 환경에서의 구조 설계 능력과 인증 흐름 이해도**를 보여주기 위해 제작되었습니다.

특히 다음에 집중했습니다:

- 세션 기반 인증 구조 이해
- 화면(include)과 처리(process) 로직 분리
- 유지보수를 고려한 파일 구조 설계
- 공공기관 스타일 UI 구현
- 전형적인 CRUD 패턴 재현

---

## 🧠 2. 설계 철학

### ① 레이아웃 분리 (include 기반 구조)

```php
include 'layout/header.php';
include 'layout/footer.php';

### 
